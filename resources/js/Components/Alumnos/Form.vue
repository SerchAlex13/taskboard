<script>
    export default {
        name: 'AlumnoForm',
    };
</script>

<script setup>
    import FormSection from '@/Components/FormSection.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import InputError from '@/Components/InputError.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    defineProps({
        form: {
            type: Object,
            required: true,
        },
        updating: {
            type: Boolean,
            required: false,
            default: false,
        },
    });

    defineEmits(['submit']);
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Editar Alumno' : 'Crear Alumno' }}
        </template>

        <template #description>
            {{ updating ? 'Editar el alumno seleccionado' : 'Crea un nuevo alumno' }}
        </template>

        <template #form>
            <div class="col-span-6">
                <InputLabel for="nombres" value="Nombres" />
                <TextInput id="nombres" v-model="form.nombres" type="text" autocomplete="nombres" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.nombres" class="mt-2" />
            </div>

            <div class="col-span-6">
                <InputLabel for="apellidos" value="Apellidos" />
                <TextInput id="apellidos" v-model="form.apellidos" type="text" autocomplete="apellidos" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.apellidos" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Guardar' : 'Crear' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>