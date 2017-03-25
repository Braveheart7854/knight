<template>
  <div class="bg">
    <div class="login-wrap">
      <form novalidate @submit.stop.prevent="submit">
        <md-input-container class="container">
          <label>username</label>
          <md-input type="text" v-on:input="change('username', $event)"></md-input>
        </md-input-container>

        <md-input-container md-has-password class="container">
          <label>password</label>
          <md-input type="password" v-on:input="change('password', $event)"></md-input>
        </md-input-container>
        <md-button class="md-raised md-primary">Login</md-button>
      </form>
    </div>
  </div>
</template>
<style>
  .bg {
    position: absolute;
    margin: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: #00a8c6;
    text-align: center;
  }

  .login-wrap {
    font-size: .7rem;
    padding: 3.57143em 5.57143em 2.85714em;
    position: relative;
    z-index: 1;
    width: 25%;
    margin: 15em auto;
  }
  .container {
    width: 100%;
    margin: 10px auto;
  }

</style>
<script>
  import actions from '../store/actions';
  export default {
    data() {
      return {

      }
    },
    methods: {
      change(field, value) {
        console.log('xxxxxxx', field, value);
        this.$store.commit('USER_LOGIN_CHANGE', field, value);
        this.$store.dispatch('login', {username: 'mulberry10', password: 123123});
      },
      submit() {
        actions.login({username: 'mulberry10', password: 123123});
      }
    },
  }
</script>