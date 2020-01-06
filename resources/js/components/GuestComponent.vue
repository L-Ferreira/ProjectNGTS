<template>
  <v-container fluid>
    <span class="trash">
      <span></span>
      <i></i>
    </span>
  </v-container>
</template>


<style>
body,
html {
  text-align: center;
}

.trash {
  background: #1c76c7;
  width: 132px;
  height: 160px;
  display: inline-block;
  margin: 0 auto;

  position: relative;
  -webkit-border-bottom-right-radius: 6px;
  -webkit-border-bottom-left-radius: 6px;
  -moz-border-radius-bottomright: 6px;
  -moz-border-radius-bottomleft: 6px;
  border-bottom-right-radius: 6px;
  border-bottom-left-radius: 6px;
}
.trash:after {
  content: "Welcome to Smart Trash";
  position: absolute;
  left: -80px;
  right: 0;
  bottom: -50px;
  width: 300px;
}
.trash span {
  position: absolute;
  height: 24px;
  background: #1c76c7;
  top: -40px;
  left: -10px;
  right: -10px;

  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  transform: rotate(0deg);
  transition: transform 250ms;
  transform-origin: 19% 100%;
}
.trash span:after {
  content: "";
  position: absolute;
  width: 52px;
  height: 14px;
  background: #1c76c7;
  top: -20px;

  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  transform: rotate(0deg);
  transition: transform 250ms;
  transform-origin: 19% 100%;
  left: 50px;
}

.trash i {
  position: relative;
  width: 10px;
  height: 100px;
  background: #fff;
  display: block;
  margin: 20px auto;
  border-radius: 10px;
}
.trash i:after {
  content: "";
  width: 10px;
  height: 100px;
  background: #fff;
  position: absolute;
  left: -36px;
  border-radius: 10px;
}
.trash i:before {
  content: "";
  width: 10px;
  height: 100px;
  background: #fff;
  position: absolute;
  right: -36px;
  border-radius: 10px;
}

.trash:hover span {
  transform: rotate(-45deg);
  transition: transform 250ms;
}
</style>
