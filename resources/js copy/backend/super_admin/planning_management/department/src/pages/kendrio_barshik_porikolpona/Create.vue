<template>
    <div class="row m-0 mt-3">
        <div class="col-sm-12">
            <div class="card w-100">
                <div class="card-header py-1 d-flex flex-column align-items-center justify-content-between gap-2">
                    <div class="d-flex align-items-center justify-content-between w-100 border-bottom pb-2">
                        <h2 class="pages_title">{{ setup.create_page_title }}</h2>
                        <router-link :to="{ name: 'CreateFormKendrioBarshikPorikolpona' }" class="btn btn-outline-warning btn-sm">Create new row </router-link>
                    </div>
                    <div class="w-100" >
                        <form action="" id="session_form" class="d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <label class="session_label" for="session">Session</label>
                                <!-- <select name="role" id="role" class="rounded px-2">
                                        <option value="">--- select session ---</option>
                                        <option value="1">2022-2023</option>
                                        <option value="2">2023-2024</option>
                                        <option value="3">2024-2025</option>
                                    </select> -->
                                <input type="date" name="session" id="session" class="rounded px-2" />
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <label for="target_expectation" class="text-nowrap">
                                    অর্জিতব্য টার্গেট
                                </label>
                                <select name="orgitobbo_target" id="orgitobbo_target" class="form-control input_padding">
                                    <option value="">--- টার্গেট বাছাই করুন ---</option>
                                    <option v-for="orgitobbo_target in orgitobbo_targets" :value="orgitobbo_target.id" :key="orgitobbo_target">
                                        {{ orgitobbo_target.title }}
                                    </option>
                                </select>
                            </div>
                            <div>
                                <a href="#" class="btn btn-outline-info btn-sm" @click.prevent>পুরনো প্ল্যান যুক্ত করুন</a>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table_responsive card_body_fixed_height">
                        <table class="table table-hover text-center table-bordered">
                            <thead>
                                <tr class="">
                                    <th>action</th>
                                    <th>si</th>
                                    <th>দফা</th>
                                    <th>কর্ম পরিকল্পনা</th>
                                    <th>ছক</th>
                                    <th>বাস্তবায়নকারী বিভাগ</th>
                                    <th>বিভাগের রেটিং</th>
                                    <th>বাস্তবায়নের মাস</th>
                                    <th>পরিকল্পনার অবাস্তবায়িত অংশ</th>
                                    <th>Suggestion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in data" :key="index">
                                    <td>
                                        <div class="action_btn d-flex gap-2 p-2">
                                            <router-link :to="{ name: 'EditFormKendrioBarshikPorikolpona', params: { id: index } }" class="btn btn-sm btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </router-link>
                                            <a @click.prevent="delete_data(index)" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ index + 1 }}</td>
                                    <td>
                                        {{ item.clause }}
                                    </td>
                                    <td>
                                        {{ item.action_plan }}
                                    </td>
                                    <td>
                                        {{ item.scheme }}
                                    </td>
                                    <td>
                                        {{ item.department.join(', ') }}
                                    </td>
                                    <td>
                                        {{ item.department.join(', ') }}
                                    </td>
                                    <td>
                                        {{ item.month.join(', ') }}
                                    </td>
                                    <td>
                                        {{ item.unimplemented_plan }}
                                    </td>
                                    <td>
                                        {{ item.suggestion }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-2">
                    <button type="button" @click.prevent="import_data" class="btn btn-sm btn-primary submit_button" :disabled="data.length === 0">Submit</button>
                </div>
            </div>
        </div>
    </div>



</template>
<script>
import { mapActions, mapState } from "pinia";
import { store as data_store } from "./custom_store/store";
export default {
  // setup(){
  //     const createStore = store();
  //     const {setup,createdData} = storeToRefs(createStore);
  //     return {createStore ,setup ,createdData}
  // }
  data: () => ({
    orgitobbo_targets: [
        { id: '1', title: 'জনে জনে দাওয়াত' },
        { id: '2', title: 'চলো গ্রামে যাই কর্মসূচী' },
        { id: '3', title: 'বৃক্ষ রোপণ কর্মসূচী' },
        { id: '4', title: 'দাওয়াতি দশক কর্মসূচী' },
        { id: '5', title: 'প্রকাশনা সপ্তাহ' },
    ],
  }),
  computed: {
    ...mapState(data_store, {
      data: "createdData",
      setup: "setup",
    }),

  },
  created:function(){
    this.log_data();
  },
  methods: {
    ...mapActions(data_store, {
      delete_store_data: "delete_created_data",
      import: "import",
    }),
    delete_data: function (index) {
        const confirmed = window.confirm("Are you sure you want to delete this item?");
        if(confirmed){
            this.delete_store_data({
              index: index,
            });
        }
    },
    submit_all: function (index) {
      this.delete_store_data({
        index: index,
      });
    },
    import_data: function () {
      const session_form = document.getElementById("session_form");
      let formData = new FormData(session_form);
      // for (let [key, value] of formData.entries()) {
      //     console.log(`${key}: ${value}`);
      // }

      this.import({
        session: formData,
      });
    },

    log_data:function(){
        console.log(this.setup);
    }
  },
};
</script>
<style>
</style>
