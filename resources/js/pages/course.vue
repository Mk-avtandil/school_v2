<script setup>
import axios from "axios";
import {onMounted, ref} from "vue";
import { useRouter } from 'vue-router';

const courses = ref();
const router = useRouter();
const pagination = ref({});

onMounted(async () => {
    await getCourses();
});

const getCourses = async (url = 'api/') => {
    try {
        const response = await axios.get(url);
        courses.value = response.data;

        pagination.value = {
            prev_page_url: response.data.links.prev,
            next_page_url: response.data.links.next
        };
    } catch (error) {
        console.error('Error fetching courses:', error);
    }
};

</script>

<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">School</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Students</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="card-group">
            <div class="card" v-for="course in courses?.data">
                <div class="card-body text-secondary">
                    <h5 class="card-title">{{course.title}}</h5>
                    <p class="card-text">{{course.description}}</p>

                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary">
                            Группы
                        </button>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropend</span>
                        </button>

                        <ul class="dropdown-menu">
                            <li v-for="group in course.groups">
                                <a class="dropdown-item" href="#">{{group.title}}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-group mx-1">
                        <button type="button" class="btn btn-secondary">
                            Уроки
                        </button>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropend</span>
                        </button>

                        <ul class="dropdown-menu">
                            <li v-for="lesson in course.lessons">
                                <a class="dropdown-item" href="#">{{lesson.title}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Price: {{course.price}}</p>
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>

</style>
