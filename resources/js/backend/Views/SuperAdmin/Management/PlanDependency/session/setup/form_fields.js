export default [
    {
        name: "title",
        label: "শিরোনাম",
        type: "text",
        value: "",
        row_col_class: "col-md-6",
    },
    {
        name: "status",
        label: "স্ট্যাটাস",
        type: "select",
        value: "",
        row_col_class: "col-md-6",
        data_list: [
            {
                label: "Active",
                value: "active",
            },
            {
                label: "Inactive",
                value: "inactive",
            },
        ],
    },

    {
        name: "serial",
        label: "সিরিয়াল",
        type: "number",
        value: "",
        row_col_class: "col-md-6",
    },
];
