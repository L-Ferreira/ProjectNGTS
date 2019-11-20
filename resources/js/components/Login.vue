<template>
<v-card>
    <v-card-text >
          <v-text-field label="Email" v-model="user.email"></v-text-field>
          <v-text-field label="Password" type="password" v-model="user.password"></v-text-field>
    </v-card-text>

    <v-card-actions class="justify-center">
       <v-btn v-on:click.prevent="login">Login</v-btn>
   </v-card-actions>
</v-card>
</template>

<script>
export default {
   data() {
      return {
         user: {
            email: "",
            password: ""
         }
      }
   },
   methods: {
      login() {
         axios.post('api/login', this.user).then(response => {
            this.$store.commit("setToken", response.data.access_token);
            return axios.get("api/users/me");
         })
         .then(response => {
            this.$store.commit("setUser", response.data.data);
            this.$router.push({ name: "homepage" });
         })
      }
   }
}
</script>