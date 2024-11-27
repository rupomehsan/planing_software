<template>
    <div>
        <form @submit.prevent="submitHandler" class="p-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-capitalize">{{ param_id ? 'Update' : 'Create' }} new {{ route_prefix }}</h5>
                    <div>
                        <router-link v-if="item.slug" class="btn btn-outline-info mr-2 btn-sm"
                            :to="{ name: `Details${route_prefix}`, params: {id: item.slug} }">
                            Details {{ route_prefix }}
                        </router-link>
                        <router-link class="btn btn-outline-warning btn-sm" :to="{ name: `All${route_prefix}` }">
                            All {{ route_prefix }}
                        </router-link>
                    </div>
                </div>
                <div class="card-body ">
                    <!-- <div class="mb-3 form-group">
                        <label for="clause">বাজেটের ধরন</label>
                        <select name="bufget_type" id="bufget_type" class="form-control input_padding">
                            <option value="">--- select clause ---</option>
                            <option value="income">আয়</option>
                            <option value="expense">ব্যয়</option>
                        </select>
                    </div> -->
                    <div class="mb-3 form-group">
                        <label for="section">
                            সেকশন
                        </label>
                        <select name="section" id="section" class="form-control input_padding" v-model="section">
                            <option value="">--- সেকশন বাছাই করুন ---</option>
                            <option v-for="section in sections" :value="section.id" :key="section">
                                {{ section.title }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="scheme">
                            সাব সেকশন
                        </label>
                        <select name="sub_section" id="sub_section" class="form-control input_padding">
                            <option value="">--- সাব সেকশন বাছাই করুন ---</option>
                            <option v-for="sub_section in sub_sections" :value="sub_section.id" :key="sub_section">
                                {{ sub_section.title }}
                            </option>
                        </select>
                    </div>
                    <!-- <div class="mb-3 form-group">
                        <label for="clause">দফা</label>
                        <select name="clause" id="clause" class="form-control input_padding">
                            <option value="">--- select clause ---</option>
                            <option value="দফা ১ঃ দাওয়াত">দফা ১ঃ দাওয়াত</option>
                            <option value="দফা ২ঃ সংগঠন">দফা ২ঃ সংগঠন</option>
                            <option value="দফা ৩ঃ প্রশিক্ষণ">দফা ৩ঃ প্রশিক্ষণ</option>
                            <option value="দফা ৪ঃ ইসলামী শিক্ষা আন্দোলন ও ছাত্র সমস্যার সমাধান">দফা ৪ঃ ইসলামী শিক্ষা আন্দোলন ও ছাত্র সমস্যার সমাধান</option>
                            <option value="দফা ৫ঃ ইসলামী সমাজ বিনির্মাণ">দফা ৫ঃ ইসলামী সমাজ বিনির্মাণ</option>
                        </select>
                    </div> -->
                    <div class="mb-3 form-group">
                        <label for="porikolponar_biboron" class="form-label  text-dark">
                            পরিকল্পনার বিবরন
                        </label>
                        <textarea class="form-control " name="porikolponar_biboron" id="porikolponar_biboron" rows="2"></textarea>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="porikolponar_biboron" class="form-label  text-dark">
                            মোট ইউনিট (প্রোগ্রাম/মাস সংখ্যা)
                        </label>
                        <input type="number" name="total_unit" class="form-control input_padding" id="total_unit" >
                    </div>
                    <div class="mb-3 form-group">
                        <label for="porikolponar_biboron" class="form-label  text-dark">
                            ইউনিট প্রতি টাকার পরিমাণ
                        </label>
                        <input type="number" name="per_unit" class="form-control input_padding" id="per_unit" >
                    </div>
                    <div class="mb-3 form-group">
                        <label for="porikolponar_biboron" class="form-label  text-dark">
                            মোট আয়/ব্যয়
                        </label>
                        <input type="number" name="total" class="form-control input_padding" id="total" >
                    </div>
                    <div class="mb-3 form-group">
                        <label for="porikolponar_biboron" class="form-label  text-dark">
                            মন্তব্য
                        </label>
                        <input type="text" name="comment" class="form-control input_padding" id="comment" >
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-square px-5">
                        <i class="icon-lock"></i>
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { store as user_store } from './setup/store';
import setup from "./setup";
import form_fields from "./setup/form_fields";

export default {
    data: () => ({
        route_prefix: '',
        form_fields,
        param_id: null,
        sections: [
            {id: 1, title: 'Infrastructure Management'},
            {id: 2, title: 'Software Development'},
            {id: 3, title: 'Cybersecurity'},
        ],
        sub_sections: [
            {id: 1, section_id:1, title: 'Network Administration'},
            {id: 2, section_id:1, title: 'Server Management'},
            {id: 3, section_id:1, title: 'Hardware Maintenance'},

            {id: 4, section_id:2, title: 'Application Development'},
            {id: 5, section_id:2, title: 'Software Maintenance'},
            {id: 6, section_id:2, title: 'Quality Assurance'},

            {id: 7, section_id:2, title: 'Security Policy Development'},
            {id: 8, section_id:2, title: 'Threat Monitoring and Response'},
            {id: 9, section_id:2, title: 'Data Protection'},
        ],
        section:"",
    }),
    created: async function () {
        let id = this.param_id = this.$route.params.id;
        this.route_prefix = setup.route_prefix;

        this.reset_fields();

        if (id) {
            this.set_fields(id);
        }
    },
    methods: {
        ...mapActions(user_store, {
            create: 'create',
            update: 'update',
            details: 'details',
        }),
        reset_fields: function () {
            this.form_fields.forEach((item) => {
                item.value = "";
            });
        },
        set_fields: async function (id) {
            this.param_id = id;
            await this.details(id);
            if (this.item) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.item).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }
                    });
                });
            }
        },

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.update($event);
                if ([200, 201].includes(response.status)) {
                    window.s_alert("data updated");
                    this.$router.push({ name: `Details${this.route_prefix}` });
                }
            } else {
                let response = await this.create($event);
                if ([200, 201].includes(response.status)) {
                    window.s_alert("data created");
                    this.$router.push({ name: `All${this.route_prefix}` });
                }
            }
        },
    },

    computed: {
        ...mapState(user_store, {
            item: "item",
        }),
    },
}
</script>
