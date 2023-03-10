import { useEffect, useState } from '@wordpress/element'
import { InstallStandaloneModal } from '../components/modals/InstallStandaloneModal'
import { useGlobalStore } from '../state/GlobalState'
import { useUserStore } from '../state/User'

/** Return any pending modals and check if any need to show  */
export const useModal = () => {
    const [modal, setModal] = useState(null)
    const open = useGlobalStore((state) => state.open)
    const pushModal = useGlobalStore((state) => state.pushModal)
    const removeAllModals = useGlobalStore((state) => state.removeAllModals)

    // Watches modals added anywhere
    useEffect(
        () =>
            useGlobalStore.subscribe(
                (value) => setModal(value?.length > 0 ? value[0] : null),
                (state) => state.modals,
            ),
        [],
    )

    // Checks for modals that need to be shown on load
    useEffect(() => {
        if (!open) {
            removeAllModals()
            return
        }
        const ModalNoticesByPriority = {
            standalone: InstallStandaloneModal,
        }
        const componentKey =
            Object.keys(ModalNoticesByPriority).find((key) => {
                if (key === 'standalone') {
                    return (
                        !window.extendifyData.standalone &&
                        !useUserStore.getState().modalNoticesDismissedAt[key]
                    )
                }
                return !useUserStore.getState().modalNoticesDismissedAt[key]
            }) ?? null

        const Modal = ModalNoticesByPriority[componentKey]
        if (Modal) pushModal(<Modal />)
    }, [open, pushModal, removeAllModals])

    return modal
}
