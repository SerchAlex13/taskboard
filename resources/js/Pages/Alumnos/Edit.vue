<script>
    export default {
        name: 'AlumnoEdit'
    };
</script>

<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import AlumnoForm from '@/Components/Alumnos/Form.vue';

    const props = defineProps({
        alumno: {
            type: Object,
            required: true,
        }
    });

    const form = useForm({
        nombres: props.alumno.nombres,
        apellidos: props.alumno.apellidos,
    });
</script>

<template>
    <AppLayout title="Editar Alumno">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Alumno
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <AlumnoForm :updating="true" :form ="form" @submit="form.put(route('alumnos.update', alumno.id))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>