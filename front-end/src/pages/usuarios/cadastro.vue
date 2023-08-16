<script setup>
import avatar1 from '@images/avatars/avatar-1.png';
import { useRoute } from 'vue-router';

const route = useRoute()
const activeTab = ref(route.params.tab)

const accountData = {
  avatarImg: avatar1,
  firstName: 'john',
  lastName: 'Doe',
  email: 'johnDoe@example.com',
  org: 'ThemeSelection',
  phone: '+1 (917) 543-9876',
  address: '123 Main St, New York, NY 10001',
  state: 'New York',
  zip: '10001',
  country: 'USA',
  language: 'English',
  timezone: '(GMT-11:00) International Date Line West',
  currency: 'USD',
}

const refInputEl = ref()
const accountDataLocal = ref(structuredClone(accountData))
const isAccountDeactivated = ref(false)

const resetForm = () => {
  accountDataLocal.value = structuredClone(accountData)
}



</script>

<template>
  <div>

    <VDivider />

    <VWindow
      v-model="activeTab"
      class="mt-5 disable-tab-transition"
    >
      <!-- Account -->
      <VWindowItem value="account">
        <VRow>
          <VCol cols="12">
            <VCard title="Account Details">
 

              <VDivider />

              <VCardText>
                <!-- 👉 Form -->
                <VForm class="mt-6">
                  <VRow>
                    <!-- 👉 First Name -->
                    <VCol
                      md="6"
                      cols="12"
                    >
                      <VTextField
                        v-model="accountDataLocal.firstName"
                        placeholder="John"
                        label="First Name"
                      />
                    </VCol>

                    <!-- 👉 Last Name -->
                    <VCol
                      md="6"
                      cols="12"
                    >
                      <VTextField
                        v-model="accountDataLocal.lastName"
                        placeholder="Doe"
                        label="Last Name"
                      />
                    </VCol>

                    <!-- 👉 Email -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VTextField
                        v-model="accountDataLocal.email"
                        label="E-mail"
                        placeholder="johndoe@gmail.com"
                        type="email"
                      />
                    </VCol>

                    <!-- 👉 Organization -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VTextField
                        v-model="accountDataLocal.org"
                        label="Organization"
                        placeholder="ThemeSelection"
                      />
                    </VCol>

                    <!-- 👉 Phone -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VTextField
                        v-model="accountDataLocal.phone"
                        label="Phone Number"
                        placeholder="+1 (917) 543-9876"
                      />
                    </VCol>

                    <!-- 👉 Address -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VTextField
                        v-model="accountDataLocal.address"
                        label="Address"
                        placeholder="123 Main St, New York, NY 10001"
                      />
                    </VCol>

                    <!-- 👉 State -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VTextField
                        v-model="accountDataLocal.state"
                        label="State"
                        placeholder="New York"
                      />
                    </VCol>

                    <!-- 👉 Zip Code -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VTextField
                        v-model="accountDataLocal.zip"
                        label="Zip Code"
                        placeholder="10001"
                      />
                    </VCol>

                    <!-- 👉 Country -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VSelect
                        v-model="accountDataLocal.country"
                        label="Country"
                        :items="['USA', 'Canada', 'UK', 'India', 'Australia']"
                        placeholder="Select Country"
                      />
                    </VCol>

                    <!-- 👉 Language -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VSelect
                        v-model="accountDataLocal.language"
                        label="Language"
                        placeholder="Select Language"
                        :items="['English', 'Spanish', 'Arabic', 'Hindi', 'Urdu']"
                      />
                    </VCol>

                    <!-- 👉 Timezone -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VSelect
                        v-model="accountDataLocal.timezone"
                        label="Timezone"
                        placeholder="Select Timezone"
                        :items="timezones"
                        :menu-props="{ maxHeight: 200 }"
                      />
                    </VCol>

                    <!-- 👉 Currency -->
                    <VCol
                      cols="12"
                      md="6"
                    >
                      <VSelect
                        v-model="accountDataLocal.currency"
                        label="Currency"
                        placeholder="Select Currency"
                        :items="currencies"
                        :menu-props="{ maxHeight: 200 }"
                      />
                    </VCol>

                    <!-- 👉 Form Actions -->
                    <VCol
                      cols="12"
                      class="d-flex flex-wrap gap-4"
                    >
                      <VBtn>Save changes</VBtn>

                      <VBtn
                        color="secondary"
                        variant="tonal"
                        type="reset"
                        @click.prevent="resetForm"
                      >
                        Reset
                      </VBtn>
                    </VCol>
                  </VRow>
                </VForm>
              </VCardText>
            </VCard>
          </VCol>
        </VRow>
      </VWindowItem>
    </VWindow>
  </div>
</template>
