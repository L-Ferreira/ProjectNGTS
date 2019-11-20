<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <v-list dense>
        <v-list-item link to="/" v-if="loggedIn">
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link to="/statistics" v-if="loggedIn">
          <v-list-item-action>
            <v-icon>mdi-chart-line-variant</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Statistics</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link to="/about">
          <v-list-item-action>
            <v-icon>mdi-information</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>About</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="indigo" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title>Smart Trash</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn text v-if="!loggedIn"><router-link to="/login">Login</router-link></v-btn>
      <v-btn text v-on:click.prevent="logout" v-if="loggedIn">Logout</v-btn>
    </v-app-bar>

    <v-content>
      <v-container class="fill-height" fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
    <v-footer color="indigo" app>
      <span
        class="white--text"
      >&copy; This project was developed as part of the curricular unit Next Generation Technologies and Services, from the Masters Degree in Computer Engineering - Mobile Computing</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  props: {
    source: String
  },
  data: () => ({
    drawer: null
  }),
  methods: {
    logout() {
      axios.post("api/logout").then(response => {
        this.$store.commit("clearUserAndToken");
        this.$router.push({name: "login"});
      })
      .catch(error => {
        this.$store.commit("clearUserAndToken");
      });
    }
  },
  computed: {
    loggedIn() {
      return this.$store.getters.loggedIn;
    },
  }
};
</script>
