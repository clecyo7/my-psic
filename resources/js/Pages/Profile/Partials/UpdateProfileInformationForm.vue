<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    email: props.user.email,
    cpf: props.user.cpf,
    naturalness: props.user.naturalness,
    date_birth: props.user.date_birth,
    uf_birth: props.user.uf_birth,
    specialty: props.user.specialty,
    number_register: props.user.number_register,
    uf: props.user.uf,
    photo: null,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

function formatCPF(cpf) {
    // Remove caracteres não numéricos
    cpf = cpf.replace(/\D/g, '');
    // Limita o CPF a 11 dígitos
    cpf = cpf.substring(0, 11);
    // Aplica a máscara
    return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
}

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }
    if (!form.errors.cpf) {
        form.post(route('user-profile-information.update'), {
            errorBag: 'updateProfileInformation',
            preserveScroll: true,
            onSuccess: () => clearPhotoFileInput(),
        });
    }
};

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            Informação do Perfil
        </template>

        <template #description>
            Atualize as informações de perfil e endereço de e-mail da sua conta.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div  class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input 
                id="photo" 
                ref="photoInput" 
                type="file" 
                class="hidden" 
                @change="updatePhotoPreview"
                >   

                <InputLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div v-show="!photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'" />
                </div>

                <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </SecondaryButton>

                <SecondaryButton v-if="user.profile_photo_path" type="button" class="mt-2" @click.prevent="deletePhoto">
                    Remove Photo
                </SecondaryButton>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Nome" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required
                    autocomplete="name" />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <!--cpf-->
            <div class="col-span-2">
                <InputLabel for="cpf" value="CPF" />
                <TextInput id="cpf" v-model="form.cpf" @blur="$filters.validateCPF(form.cpf, form)" type="text"
                    class="mt-1 block w-full" required autocomplete="cpf" :value="formatCPF(form.cpf)" />
                <InputError class="mt-2" :message="form.errors.cpf" />
            </div>


            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                    autocomplete="username" />
                <InputError :message="form.errors.email" class="mt-2" />

                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Your email address is unverified.
                        <Link :href="route('verification.send')" method="post" as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click.prevent="sendEmailVerification">
                        Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div>
            </div>

            <!--date_birth-->
            <div class="col-span-2">
                <InputLabel for="date_birth" value="Data de Nascimento" />
                <TextInput id="date_birth" v-model="form.date_birth" type="date" class="mt-1 block w-full" required
                    autofocus autocomplete="date_birth" />
                <InputError class="mt-2" :message="form.errors.date_birth" />
            </div>

            <!--number_register-->
            <div class="col-span-2">
                <InputLabel for="number_register" value="Número do Registro" />
                <TextInput id="number_register" v-model="form.number_register" type="number" class="mt-1 block w-full"
                    required autofocus autocomplete="number_register" />
                <InputError class="mt-2" :message="form.errors.number_register" />
            </div>
            <!--specialty-->
            <div class="col-span-2">
                <InputLabel for="specialty" value="Especialidade" />
                <select id="specialty" v-model="form.specialty"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required>
                    <option value="" disabled selected>Escolha uma opção</option>
                    <option value="Psicologia">Psicologia</option>
                    <option value="Psiquiatria">Psiquiatria</option>
                    <!-- Adicione mais opções conforme necessário -->
                </select>
                <InputError class="mt-2" :message="form.errors.specialty" />
            </div>


            <!--uf-->
            <div class="col-span-2">
                <InputLabel for="specialty" value="UF" />
                <select id="uf" v-model="form.uf"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required>
                    <option value="" disabled selected>Escolha uma opção</option>
                    <option value="AC" label="Acre">Acre</option>
                    <option value="AL" label="Alagoas">Alagoas</option>
                    <option value="AP" label="Amapá">Amapá</option>
                    <option value="AM" label="Amazonas">Amazonas</option>
                    <option value="BA" label="Bahia">Bahia</option>
                    <option value="CE" label="Ceará">Ceará</option>
                    <option value="DF" label="Distrito Federal">Distrito Federal</option>
                    <option value="ES" label="Espírito Santo">Espírito Santo</option>
                    <option value="GO" label="Goiás">Goiás</option>
                    <option value="MA" label="Maranhão">Maranhão</option>
                    <option value="MT" label="Mato Grosso">Mato Grosso</option>
                    <option value="MS" label="Mato Grosso do Sul">Mato Grosso do Sul</option>
                    <option value="MG" label="Minas Gerais">Minas Gerais</option>
                    <option value="PA" label="Pará">Pará</option>
                    <option value="PB" label="Paraíba">Paraíba</option>
                    <option value="PR" label="Paraná">Paraná</option>
                    <option value="PE" label="Pernambuco">Pernambuco</option>
                    <option value="PI" label="Piauí">Piauí</option>
                    <option value="RJ" label="Rio de Janeiro">Rio de Janeiro</option>
                    <option value="RN" label="Rio Grande do Norte">Rio Grande do Norte</option>
                    <option value="RS" label="Rio Grande do Sul">Rio Grande do Sul</option>
                    <option value="RO" label="Rondônia">Rondônia</option>
                    <option value="RR" label="Roraima">Roraima</option>
                    <option value="SC" label="Santa Catarina">Santa Catarina</option>
                    <option value="SP" label="São Paulo">São Paulo</option>
                    <option value="SE" label="Sergipe">Sergipe</option>
                    <option value="TO" label="Tocantins">Tocantins</option>
                    <option value="98" label="Exterior">Exterior</option>
                </select>

                <InputError class="mt-2" :message="form.errors.uf" />
            </div>
            <!--naturalness-->
            <div class="col-span-2">
                <InputLabel for="naturalness" value="Naturalidade" />
                <TextInput id="naturalness" v-model="form.naturalness" type="text" class="mt-1 block w-full" required
                    autofocus autocomplete="naturalness" />
                <InputError class="mt-2" :message="form.errors.naturalness" />
            </div>

            <!--uf_birth-->
            <div class="col-span-2">
                <InputLabel for="uf_birth" value="UF de Nascimento" />
                <select id="uf_birth" v-model="form.uf_birth"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required>
                    <option value="" disabled selected>Escolha uma opção</option>
                    <option value="AC" label="Acre">Acre</option>
                    <option value="AL" label="Alagoas">Alagoas</option>
                    <option value="AP" label="Amapá">Amapá</option>
                    <option value="AM" label="Amazonas">Amazonas</option>
                    <option value="BA" label="Bahia">Bahia</option>
                    <option value="CE" label="Ceará">Ceará</option>
                    <option value="DF" label="Distrito Federal">Distrito Federal</option>
                    <option value="ES" label="Espírito Santo">Espírito Santo</option>
                    <option value="GO" label="Goiás">Goiás</option>
                    <option value="MA" label="Maranhão">Maranhão</option>
                    <option value="MT" label="Mato Grosso">Mato Grosso</option>
                    <option value="MS" label="Mato Grosso do Sul">Mato Grosso do Sul</option>
                    <option value="MG" label="Minas Gerais">Minas Gerais</option>
                    <option value="PA" label="Pará">Pará</option>
                    <option value="PB" label="Paraíba">Paraíba</option>
                    <option value="PR" label="Paraná">Paraná</option>
                    <option value="PE" label="Pernambuco">Pernambuco</option>
                    <option value="PI" label="Piauí">Piauí</option>
                    <option value="RJ" label="Rio de Janeiro">Rio de Janeiro</option>
                    <option value="RN" label="Rio Grande do Norte">Rio Grande do Norte</option>
                    <option value="RS" label="Rio Grande do Sul">Rio Grande do Sul</option>
                    <option value="RO" label="Rondônia">Rondônia</option>
                    <option value="RR" label="Roraima">Roraima</option>
                    <option value="SC" label="Santa Catarina">Santa Catarina</option>
                    <option value="SP" label="São Paulo">São Paulo</option>
                    <option value="SE" label="Sergipe">Sergipe</option>
                    <option value="TO" label="Tocantins">Tocantins</option>
                    <option value="98" label="Exterior">Exterior</option>
                    <!-- Adicione mais opções conforme necessário -->
                </select>
                <InputError class="mt-2" :message="form.errors.uf_birth" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Salvar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
