<template>
  <div class="bg">
    <div class="login-wrap">
      <form novalidate @submit.stop.prevent="submit">
        <span class="md-error">{{auth.message}}</span>
        <md-input-container class="container">
          <label>username</label>
          <md-input type="text" v-on:input="change('username', $event)"></md-input>
        </md-input-container>

        <md-input-container md-has-password class="container">
          <label>password</label>
          <md-input type="password" v-on:input="change('password', $event)"></md-input>
        </md-input-container>
        <md-button class="md-raised md-primary" type="submit">Login</md-button>
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
  import {mapGetters, mapState} from 'vuex'
  export default {
    data() {
      const auth = this.$store.getters.getUserInfo;
      return {
        auth,
      }
    },
    methods: {
      change(field, value) {
        console.log('xxxxxxx', field, value);
        const data = {};
        data[field] = value;
        this.$store.commit('USER_LOGIN_CHANGE', data);
      },
      submit() {
        console.log(this.$store.getters.getUserInfo, this.$store.state.user);
        const userInfo = this.$store.getters.getUserInfo;
        if (userInfo) {
          const { password, username } = userInfo;
          console.log('&*&*&*&*submit', username, password);
          this.$store.dispatch('login', { username, password });
          console.log(this.$store.state.user);
          this.auth = this.$store.state.user.auth;
        }
      }
    },
    beforeUpdate() {
      console.log('mmmmmmmmmmoutd');
    }
  }
</script>