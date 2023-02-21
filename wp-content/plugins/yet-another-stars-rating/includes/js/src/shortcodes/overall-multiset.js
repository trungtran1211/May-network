const arrayClasses = ['yasr-rater-stars', 'yasr-multiset-visitors-rater'];

/*** Constant used by yasr
 yasrWindowVar (ajaxurl,  isrtl)
***/

for (let i=0; i<arrayClasses.length; i++) {
    //Search and set all div with class yasr-multiset-visitors-rater
    yasrSearchStarsDom(arrayClasses[i]);
}

/**
 * Search for divs with defined classname
 */
export function yasrSearchStarsDom (starsClass) {
    //At pageload, check if there is some shortcode with class yasr-rater-stars
    const yasrRaterInDom = document.getElementsByClassName(starsClass);
    //If so, call the function to set the rating
    if (yasrRaterInDom.length > 0) {
        //stars class for most shortcodes
        if(starsClass === 'yasr-rater-stars') {
            yasrSetRating(yasrRaterInDom);
        }

        if (starsClass === 'yasr-multiset-visitors-rater') {
            yasrRaterVisitorsMultiSet(yasrRaterInDom)
        }
    }
}

function yasrSetRating (yasrRatingsInDom) {

    //Check in the object
    for (let i = 0; i < yasrRatingsInDom.length; i++) {
        //yasr-star-rating is the class set by rater.js : so, if already exists,
        //means that rater already run for the element
        if(yasrRatingsInDom.item(i).classList.contains('yasr-star-rating') === false) {
            const element  = yasrRatingsInDom.item(i);
            const htmlId   = element.id;
            const starSize = element.getAttribute('data-rater-starsize');
            yasrSetRaterValue(starSize, htmlId, element);
        }
    }

}

function yasrRaterVisitorsMultiSet (yasrMultiSetVisitorInDom) {
    //will have field id and vote
    var ratingObject = "";

    //an array with all the ratings objects
    var ratingArray = [];

    const hiddenFieldMultiReview = document.getElementById('yasr-pro-multiset-review-rating');

    //Check in the object
    for (let i = 0; i < yasrMultiSetVisitorInDom.length; i++) {
        (function (i) {
            //yasr-star-rating is the class set by rater.js : so, if already exists,
            //means that rater already run for the element
            if(yasrMultiSetVisitorInDom.item(i).classList.contains('yasr-star-rating') !== false) {
                return;
            }

            let elem       = yasrMultiSetVisitorInDom.item(i);
            let htmlId     = elem.id;
            let readonly   = elem.getAttribute('data-rater-readonly');
            let starSize   = elem.getAttribute('data-rater-starsize');
            if(!starSize) {
                starSize = 16;
            }

            readonly = yasrTrueFalseStringConvertion(readonly);

            const rateCallback = function (rating, done) {
                const postId     = elem.getAttribute('data-rater-postid');
                const setId      = elem.getAttribute('data-rater-setid');
                const setIdField = elem.getAttribute('data-rater-set-field-id');

                //Just leave 1 number after the .
                rating = rating.toFixed(1);
                //Be sure is a number and not a string
                const vote = parseInt(rating);

                this.setRating(vote); //set the new rating

                ratingObject = {
                    postid: postId,
                    setid: setId,
                    field: setIdField,
                    rating: vote
                };

                //creating rating array
                ratingArray.push(ratingObject);

                if(hiddenFieldMultiReview) {
                    hiddenFieldMultiReview.value = JSON.stringify(ratingArray);
                }

                done();

            }

            yasrSetRaterValue (starSize, htmlId, elem, 1, readonly, false, rateCallback);

        })(i);

    }

    jQuery('.yasr-send-visitor-multiset').on('click', function() {
        const multiSetPostId = this.getAttribute('data-postid');
        const multiSetId     = this.getAttribute('data-setid');
        const nonce          = this.getAttribute('data-nonce');

        jQuery('#yasr-send-visitor-multiset-'+multiSetPostId+'-'+multiSetId).hide();
        jQuery('#yasr-loader-multiset-visitor-'+multiSetPostId+'-'+multiSetId).show();

        const isUserLoggedIn   = JSON.parse(yasrWindowVar.isUserLoggedIn);

        const data = {
            action: 'yasr_visitor_multiset_field_vote',
            post_id: multiSetPostId,
            rating: ratingArray,
            set_id: multiSetId
        };

        if(isUserLoggedIn === true) {
            Object.assign(data, {nonce: nonce});
        }

        //Send value to the Server
        jQuery.post(yasrWindowVar.ajaxurl, data).done(
            function(response) {
                let responseText;
                response = JSON.parse(response);
                responseText = response.text

                jQuery('#yasr-loader-multiset-visitor-' + multiSetPostId + '-' + multiSetId).text(responseText);
            }).fail(
            function(e, x, settings, exception) {
                console.error('YASR ajax call failed. Can\'t save data');
                console.log(e);
            });

    });
    
} //End function