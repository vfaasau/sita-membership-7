<script setup>
import { useForm, Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import LayoutGuest from '@/Layouts/LayoutGuest.vue'
import SectionFullScreen from '@/Components/SectionFullScreen.vue'
import CardBox from '@/Components/CardBox.vue'
import FormControl from '@/Components/FormControl.vue'
import FormField from '@/Components/FormField.vue'
import BaseDivider from '@/Components/BaseDivider.vue'
import BaseButton from '@/Components/BaseButton.vue'
import FormValidationErrors from '@/Components/FormValidationErrors.vue'
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue'

const form = useForm({
  password: '',
})

const passwordInput = ref(null)

const submit = () => {
  form.post(route('password.confirm'), {
    onFinish: () => {
      form.reset()

      passwordInput.value?.focus()
    },
  })
}
</script>

<template>
  <LayoutGuest>
    <Head title="Secure Area" />

    <SectionFullScreen v-slot="{ cardClass }" bg="purplePink">
      <CardBox :class="cardClass" is-form @submit.prevent="submit">
        <FormValidationErrors />

        <AuthenticationCardLogo />

        <FormField>
          <div class="mb-4 text-sm text-gray-600">This is a secure area of the application. Please confirm your password before continuing.</div>
        </FormField>

        <FormField label="Password" label-for="password" help="Please enter your password to confirm">
          <FormControl id="password" v-model="form.password" type="password" required autocomplete="current-password" @set-ref="passwordInput = $event" />
        </FormField>

        <BaseDivider />

        <BaseButton type="submit" color="info" label="Confirm" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" />
      </CardBox>
    </SectionFullScreen>
  </LayoutGuest>
</template>
