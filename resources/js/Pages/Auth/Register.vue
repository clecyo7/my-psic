<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    cpf: '',
    date_birth: '',
    date_birth: '',
    specialty: '',
    number_register: '',
    uf: '',
    uf_birth: '',
    naturalness: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div class="grid grid-cols-4 gap-4">
                <!--name-->
                <div class="col-span-4">
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus
                        autocomplete="name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <!--cpf-->
                <div class="col-span-2">
                    <InputLabel for="cpf" value="CPF" />
                    <TextInput id="cpf" v-model="form.cpf" type="text" class="mt-1 block w-full" required autofocus
                        autocomplete="cpf" />
                    <InputError class="mt-2" :message="form.errors.cpf" />
                </div>
                <!--date_birth-->
                <div class="col-span-2">
                    <InputLabel for="date_birth" value="Data de Nascimento" />
                    <TextInput id="date_birth" v-model="form.date_birth" type="date" class="mt-1 block w-full" required
                        autofocus autocomplete="date_birth" />
                    <InputError class="mt-2" :message="form.errors.cpf" />
                </div>
                <!--email-->
                <div class="col-span-2">
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                        autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <!--number_register-->
                <div class="col-span-2">
                    <InputLabel for="number_register" value="Número do Registro" />
                    <TextInput id="number_register" v-model="form.number_register" type="number" class="mt-1 block w-full"
                        required autofocus autocomplete="number_register" />
                    <InputError class="mt-2" :message="form.errors.cpf" />
                </div>
                <!--specialty-->
                <div class="col-span-2">
                    <div class="mt-4">
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
                </div>
                <!--uf-->
                <div class="col-span-2">
                    <div class="mt-4">
                        <InputLabel for="specialty" value="UF" />
                        <select id="uf" v-model="form.uf"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                            <option value="" disabled selected>Escolha uma opção</option>
                            <option value="11">RO</option>
                            <option value="12">AC</option>
                            <option value="13">AM</option>
                            <option value="14">RR</option>
                            <option value="15">PA</option>
                            <option value="16">AP</option>
                            <option value="17">TO</option>
                            <option value="21">MA</option>
                            <option value="22">PI</option>
                            <option value="23">CE</option>
                            <option value="24">RN</option>
                            <option value="25">PB</option>
                            <option value="26">PE</option>
                            <option value="27">AL</option>
                            <option value="28">SE</option>
                            <option value="29">BA</option>
                            <option value="31">MG</option>
                            <option value="32">ES</option>
                            <option value="33">RJ</option>
                            <option value="35">SP</option>
                            <option value="41">PR</option>
                            <option value="42">SC</option>
                            <option value="43">RS</option>
                            <option value="50">MS</option>
                            <option value="51">MT</option>
                            <option value="52">GO</option>
                            <option value="53">DF</option>
                            <option value="98">EX</option>
                            <!-- Adicione mais opções conforme necessário -->
                        </select>
                        <InputError class="mt-2" :message="form.errors.uf" />
                    </div>
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
                        <option value="" disabled selected>selecione uma opção</option>
                        <option value="11">RO</option>
                        <option value="12">AC</option>
                        <option value="13">AM</option>
                        <option value="14">RR</option>
                        <option value="15">PA</option>
                        <option value="16">AP</option>
                        <option value="17">TO</option>
                        <option value="21">MA</option>
                        <option value="22">PI</option>
                        <option value="23">CE</option>
                        <option value="24">RN</option>
                        <option value="25">PB</option>
                        <option value="26">PE</option>
                        <option value="27">AL</option>
                        <option value="28">SE</option>
                        <option value="29">BA</option>
                        <option value="31">MG</option>
                        <option value="32">ES</option>
                        <option value="33">RJ</option>
                        <option value="35">SP</option>
                        <option value="41">PR</option>
                        <option value="42">SC</option>
                        <option value="43">RS</option>
                        <option value="50">MS</option>
                        <option value="51">MT</option>
                        <option value="52">GO</option>
                        <option value="53">DF</option>
                        <option value="98">EX</option>
                        <!-- Adicione mais opções conforme necessário -->
                    </select>
                    <InputError class="mt-2" :message="form.errors.uf_birth" />
                </div>
                <!--passowrd-->
                <div class="col-span-2">
                    <InputLabel for="password" value="Password" />
                    <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required
                        autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                <!--password_confirmation-->
                <div class="col-span-2">
                    <InputLabel for="password_confirmation" value="Confirm Password" />
                    <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password"
                        class="mt-1 block w-full" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4 col-span-2">
                    <InputLabel for="terms">
                        <div class="flex items-center">
                            <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                            <div class="ms-2">
                                I agree to the <a target="_blank" :href="route('terms.show')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms
                                    of Service</a> and <a target="_blank" :href="route('policy.show')"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy
                                    Policy</a>
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </InputLabel>
                </div>
                <!--buttons-->
                <div class="col-span-4 flex items-center justify-end mt-4">
                    <Link :href="route('login')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </div>
        </form>
    </AuthenticationCard>
</template>
