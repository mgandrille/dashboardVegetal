<template>
  <div id="app">
    <div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </div>
    <router-view/>
  </div>
</template>

<style lang="scss">
  /* colors */
  $blue: #1A432A;
  $gray-600: #C98E3E;
  $green :#228749;
  $gray-100: #EDECEA;

  /* shapes */
  $border-radius: .12rem;
  @import "../../node_modules/bootstrap/scss/bootstrap.scss";
</style>
