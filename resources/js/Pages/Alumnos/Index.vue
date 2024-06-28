<script>
    export default {
        name: 'AlumnoIndex'
    };
</script>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3'

    defineProps({
        alumnos: {
            type: Object,
            required: true,
        }
    });

    const deleteAlumno = id => {
        if (confirm('¿Estás seguro?')) {
            router.delete(route('alumnos.destroy', id))
        }
    };
</script>

<template>
    <AppLayout title="Alumnos">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Alumnos
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end">
                        <Link :href="route('alumnos.create')" class="px-4 py-2 rounded-xl bg-gray-900 text-white hover:bg-gray-800">
                            Crear Alumno
                        </Link>
                    </div>

                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li v-for="alumno in alumnos.data" class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-md font-semibold leading-6 text-gray-900">
                                            {{ alumno.nombres }} {{ alumno.apellidos }}
                                        </p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-gray-900">
                                        <Link :href="route('alumnos.edit', alumno.id)">
                                            Editar
                                        </Link>
                                    </p>
                                    <p class="text-sm leading-6 text-gray-900">
                                        <Link href="#" @click="deleteAlumno(alumno.id)">
                                            Eliminar
                                        </Link>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>