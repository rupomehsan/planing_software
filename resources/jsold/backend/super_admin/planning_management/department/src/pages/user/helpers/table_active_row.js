function active_row(toggle_icon, e) {
    if (toggle_icon.current) {
        let parent = toggle_icon.current.parentNode;
        if (parent && parent.parentNode) {
            parent = parent.parentNode;
        }

        const table_rows =
            document.querySelectorAll('.table_rows');
        if (table_rows.length) {
            [...table_rows].forEach((i) => {
                if (i !== parent) i.classList.remove('active');
            });
        }

        if (parent) {
            parent.classList.toggle('active');
        }
    }
}

export default active_row;
