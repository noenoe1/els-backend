<template>
    <app-layout>
        <breadcrumb-default :items="breadcrumbs" class="mt-10 mx-4 md:mb-6" />
        <div
            class="w-full mt-10 mx-4 lg:w-1/2 h-auto overflow-hidden border border-1 border-primary-100 dark:bg-secondary-dark lg:rounded-xl rounded">
            <!-- card header start -->
            <div class="bg-primary-50 dark:bg-primary-900 py-2.5 ps-4">
                <h6-label>Add Course</h6-label>
            </div>
            <!-- card header end -->

            <!-- card body start -->
            <div class="px-4 mt-6">
                <form @submit.prevent="form.post(route('courses.store'))">
                    <div class="grid w-full gap-6">
                        <div>
                            <default-label for="category">Course Category<span class="text-red-600">*</span></default-label>
                            <input-ui id="category" ref="category" type="text" v-model:value="form.category" />
                            <div v-if="errors.category" class="pt-2 text-red-600"> {{ errors.category }} </div>
                        </div>

                        <div>
                            <default-label for="name">Course Name<span class="text-red-600">*</span></default-label>
                            <input-ui id="name" ref="name" type="text" v-model:value="form.name" />
                            <div v-if="errors.name" class="pt-2 text-red-600"> {{ errors.name }} </div>
                        </div>

                        <div>
                            <default-label for="description">Course Description</default-label>
                            <text-area-ui id="description" ref="description" v-model:value="form.description" />
                        </div>

                        <div>
                            <input type="file" @change="uploadPhoto" name="photo"
                                class="block w-full text-sm text-primary-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100" />
                            <img v-if="form.photo" :src="getPhoto()" class="w-46 h-32 rounded-md mt-4" />
                            <div v-if="errors.photo" class="pt-2 text-red-600"> {{ validates.photo }} </div>
                        </div>

                        <div class="flex justify-end mb-4 space-x-2">
                            <Link :href="route('courses.index')">
                                <button-ui type="submit" bgColor="bg-gray-50 dark:bg-primary-dark" textColor="text-gray-900">Cancel</button-ui>
                            </Link>
                            <button-loading bgColor="bg-primary-500">Save</button-loading>
                        </div>
                    </div>
                </form>
            </div>
            <!-- card body end -->

        </div>
    </app-layout>
</template>
<script setup>
import { computed } from 'vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '../../layouts/App.vue';
import DefaultLabel from '../../components/label/DefaultLabel.vue';
import InputUi from '../../components/input/InputUi.vue';
import ButtonLoading from '../../components/button/ButtonLoading.vue';
import ButtonUi from '../../components/button/ButtonUi.vue';
import H6Label from '../../components/label/H6Label.vue';
import TextAreaUi from '../../components/textarea/TextAreaUi.vue';
import BreadcrumbDefault from '../../components/breadcrumb/BreadcrumbDefault.vue';

const breadcrumbs = computed(() => {
    return [
        {
            label: "Courses",
            url: "courses.index",
        },
        {
            label: "Add Course",
            color: "text-gray-400"
        }
    ]
})

let form = useForm({
    category: '',
    name: '',
    description: '',
    photo: ''
})

defineProps({ errors: Object })

const uploadPhoto = (e) => {
    let file = e.target.files[0];
    let reader = new FileReader();

    if (file['size'] < 2111775) {
        reader.onloadend = () => {
            form.photo = reader.result;
        }
        reader.readAsDataURL(file);
    } else {
        alert('File size can not be bigger than 2 MB');
    }
};

//For getting Instant Uploaded Photo
const getPhoto = () => {
    let photo = (form.photo.length > 100) ? form.photo : "/img/upload/" + form.photo;
    return photo;
}
</script>