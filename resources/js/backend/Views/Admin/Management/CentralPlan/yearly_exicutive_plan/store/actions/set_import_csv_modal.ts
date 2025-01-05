import { mapActions, mapWritableState } from "pinia";
import { store } from "..";

async function set_import_csv_modal(status = false) {
    let state = mapWritableState(store, [
        'import_csv_modal_show'
    ]);

    state.import_csv_modal_show.set(status);
}

export default set_import_csv_modal;
