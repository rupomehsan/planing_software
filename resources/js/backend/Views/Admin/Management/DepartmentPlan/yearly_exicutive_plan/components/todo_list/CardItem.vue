<template>
    <div class="card-item" @click="toggleDetails(data)">
        <div class="card-item-header card-item-active">
            <div
                class="d-flex align-items-center gap-3 justify-content-between"
            >
                <span @click="show_details">
                    <span v-if="is_show_details">
                        <i class="fa fa-circle-minus text-primary"></i>
                    </span>
                    <span v-else>
                        <i class="fa fa-circle-plus text-primary"></i>
                    </span>
                </span>

                <label
                    @click="task_completed"
                    class="check-label"
                    :class="data.is_completed == 1 ? 'complete' : ''"
                ></label>
                <p class="fw-bold">{{ data.title }}</p>
                <p class="mx-2">
                    <i class="far fa-calendar mx-2"></i>
                    {{ new Date(data.created_at).toLocaleDateString() }}
                </p>
                <p>
                    <i class="far fa-clock mx-2"></i>
                    {{ new Date(data.created_at).toLocaleTimeString() }}
                </p>
            </div>
            <div
                class="star"
                @click="add_to_favourite"
                :class="data.is_favorite == 1 ? 'active' : ''"
            >
                <span></span>
            </div>
        </div>
        <div class="card-item-footer" v-if="is_show_details">
            <p>
                <i class="far fa-calendar text-success"></i>
                <span>Session : {{ data.session?.title }}</span>
            </p>
            <p>
                <i class="far fa-star text-success"></i>
                <span>Rating : {{ data.rating }}</span>
            </p>
            <p>
                <i class="far fa-clock text-success"></i>
                <span>Executive Month : {{ data.bastobayoner_mash }}</span>
            </p>
        </div>
    </div>
</template>

<script>
import { mapActions, mapWritableState } from "pinia";
import { store } from "../../store";
export default {
    props: ["data"],
    data: () => ({
        is_show_details: false,
    }),

    methods: {
        ...mapActions(store, [
            "set_show_details_canvas",
            "set_item",
            "get_all",
            "set_only_latest_data",
        ]),
        show_details(event) {
            event.stopPropagation();
            this.is_show_details = !this.is_show_details;
        },
        toggleDetails(item) {
            console.log(item);
            this.set_item(item);
            this.set_show_details_canvas(!this.show_details_canvas);
        },
        async task_completed(event) {
            event.stopPropagation();
            let contirmation = await s_confirm("Are you sure want to action?");

            if (!contirmation) {
                return false;
            }

            let response = await axios.post(
                `department-yearly-executive-plan/completion/${this.data.id}`
            );

            if (response.data.status == "success") {
                window.s_alert(response.data.message);
                this.set_only_latest_data(true);
                await this.get_all();
            }
        },
        async add_to_favourite(event) {
            event.stopPropagation();
            let contirmation = await s_confirm("Are you sure want to action?");

            if (!contirmation) {
                return false;
            }

            let response = await axios.post(
                `department-yearly-executive-plan/add-to-favourite/${this.data.id}`
            );

            if (response.data.status == "success") {
                window.s_alert(response.data.message);
                this.set_only_latest_data(true);
                await this.get_all();
            }
        },
    },
    computed: {
        ...mapWritableState(store, ["show_details_canvas", "item"]),
    },
};
</script>

<style scoped>
.card-item {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    border-radius: 3px;
    border: 1px solid #cccccc81;
    padding: 15px;
    margin: 10px 0;
}
.card-item-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.card-item-footer {
    margin-left: 32px;
}
.card-item-footer p span {
    margin-left: 18px;
    font-size: 12px;
}
.card-item:hover {
    background-color: #f0f8ff;
}

/* .card-item-active {
    background-color: #f0f8ff;
} */

.check-label {
    width: 16px;
    height: 16px;
    border: 1px solid #007bff98;
    border-radius: 50%;
    display: inline-block;
    cursor: pointer;
    position: relative;
}

.check-label::after {
    content: "✔";
    font-size: 7px;
    color: white;
    width: 15px;
    height: 14px;
    border-radius: 50%;
    position: absolute;
    top: 0;
    left: 0;
    display: none;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.check-label:hover::after {
    display: flex;
}
.check-label.complete::after {
    display: flex;
}

input[type="radio"]:checked + .check-label::after {
    display: flex;
}

.card-item p {
    margin: 0;
    font-size: 14px;
    text-transform: capitalize;
}
.star {
    font-size: 20px;
    color: #007bff;
    cursor: pointer;
    transition: color 0.3s, transform 0.2s;
}

.star::before {
    content: "\2606";
}

.star:hover::before {
    content: "\2605";
    color: #ff9800;
}

.star.active::before {
    content: "\2605";
    color: #007bff;
}
</style>
