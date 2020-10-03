<template>

    <form
        @submit.prevent="register"
        action="#" method="POST" novalidate>
        <input type="hidden" name="_token" :value="csrf">

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

            <div class="col-md-6">
                <input
                    v-model.trim="$v.name.$model"
                    :class="{ 'is-invalid': $v.name.$error }"
                    id="name"
                    type="text" class="form-control" name="name" required autocomplete="name" autofocus>

                <span
                    v-if="!$v.name.error"
                    class="invalid-feedback" role="alert">
                    <strong>Campo invalido</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Apellido</label>

            <div class="col-md-6">
                <input
                    v-model.trim="$v.lastname.$model"
                    :class="{ 'is-invalid': $v.mothers_lastname.$error }"
                    id="lastname" type="text" class="form-control" name="lastname" required autocomplete="lastname" autofocus>

                <span
                    v-if="!$v.lastname.error"
                    class="invalid-feedback" role="alert">
                    <strong>Campo invalido</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Apellido materno</label>

            <div class="col-md-6">
                <input
                    v-model.trim="$v.mothers_lastname.$model"
                    :class="{ 'is-invalid': $v.mothers_lastname.$error }"
                    id="mothers_lastname" type="text" class="form-control" name="mothers_lastname" required autocomplete="mothers_lastname" autofocus>

            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
                <input
                    v-model.trim="$v.email.$model"
                    :class="{ 'is-invalid': $v.email.$error }"
                    id="email" type="email" class="form-control" name="email" required autocomplete="email">

                <span
                    v-if="!$v.email.error"
                    class="invalid-feedback" role="alert">
                    <strong>Campo invalido</strong>
                </span>

            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input
                    v-model.trim="$v.password.$model"
                    :class="{ 'is-invalid': $v.password.$error }"
                    id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

                <span
                    v-if="!$v.password.error"
                    class="invalid-feedback" role="alert">
                    <strong>Campo invalido</strong>
                </span>

            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmación</label>

            <div class="col-md-6">
                <input
                    v-model.trim="$v.password_confirmation.$model"
                    :class="{ 'is-invalid': $v.password_confirmation.$error }"
                    id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                <span
                    v-if="!$v.password_confirmation.error"
                    class="invalid-feedback" role="alert">
                    <strong>Campo invalido</strong>
                </span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit"
                        :class="[ !$v.$invalid? 'btn-primary': 'btn-secondary']"
                        class="btn">
                    Agregar
                </button>
            </div>
        </div>
    </form>

</template>

<script>
import { required, minLength, maxLength, sameAs, email } from 'vuelidate/lib/validators';

export default {
    name: "RegisterForm",
    props: ['role'],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            errors: {},
            name: null,
            email: null,
            lastname: null,
            mothers_lastname: null,
            password: null,
            password_confirmation: null,
        }
    },
    validations: {
        name: {
            required,
            minLength: minLength(3),
            maxLength: maxLength(255)
        },
        email: {
            required,
            email,
            minLength: minLength(6),
            maxLength: maxLength(255)
        },
        lastname: {},
        mothers_lastname: {},
        password: {
            required,
            minLength: minLength(6),
            maxLength: maxLength(255)
        },
        password_confirmation: {
            sameAsPassword: sameAs('password')
        },
    },
    methods:{
        register() {
            console.log(this.$v);
        }
    },
}
</script>

<style scoped>

</style>
