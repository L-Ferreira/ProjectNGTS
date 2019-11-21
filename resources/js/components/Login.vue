<template>
  <v-container fluid>
    <v-card>
      <v-alert dense type="warning" v-if="isMessageVisible">{{ errorMessage }}</v-alert>
      <v-card-text>
        <v-text-field label="Email" v-model="user.email" v-on:keyup.enter="login"></v-text-field>
        <v-text-field
          label="Password"
          type="password"
          v-model="user.password"
          v-on:keyup.enter="login"
        ></v-text-field>
      </v-card-text>

      <v-card-actions class="justify-center">
        <v-btn v-on:click.prevent="login" color="primary">Login</v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      user: {
        email: "",
        password: ""
      },
      errorMessage: "",
      isMessageVisible: false,
      numeroTentantivas: 0,
      isBlocked: 0
    };
  },
  methods: {
    login() {
      this.isMessageVisible = false;

      axios.put("api/user/getUserBlock", { email: this.user.email }).then(response => {
        this.isBlocked = response.data;
      });

      if(this.isBlocked == 0) {
         axios
        .post("api/login", this.user)
        .then(response => {
          this.$store.commit("setToken", response.data.access_token);
          return axios.get("api/users/me");
        })
        .then(response => {
          this.$store.commit("setUser", response.data.data);
          this.$router.push({ name: "homepage" });
        })
        .catch(error => {
          this.isMessageVisible = true;
          this.errorMessage = "Credenciais inválidas!";

          if (this.user.email && this.user.password) {
            this.numeroTentantivas++;
            console.log(this.numeroTentantivas);
          }

          if (this.numeroTentantivas >= 3) {
            //! Número de tentativas excedidas
            this.errorMessage ="O utilizador " + this.user.email +" excedeu as 3 tentativas de login, sendo bloqueado";

            axios.post("api/generateLog", { message: this.errorMessage }).then(response => {
                axios.put("api/user/blockByEmail/", { email: this.user.email }).then(response => {});
              });
          }
        });
      } else {
         this.isMessageVisible = true;
         this.errorMessage ="O utilizador " + this.user.email +" está bloqueado";
      }
    },
  }
};
</script>