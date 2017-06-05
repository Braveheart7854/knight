<template>
  <div class="bg">
    <div class="login-wrap">
      <form novalidate @submit.stop.prevent="submit">
        <span class="md-error">{{message}}</span>
        <md-input-container class="container">
          <label>username</label>
          <md-input type="text" v-model="username"></md-input>
        </md-input-container>

        <md-input-container md-has-password class="container">
          <label>password</label>
          <md-input type="password" v-model="password"></md-input>
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
  import Storage from '../util/storage-ext';

  const storage = new Storage();
  export default {
    data() {
      const { message, ok } = this.$store.state.user;
      console.log('fffffuck', message, ok);
      return {
        username: '',
        password: '',
        message: '',
        ok: false,
      }
    },
    methods: {
      change(field, value) {
        const data = {};
        data[field] = value;
        this.$store.commit('USER_LOGIN_CHANGE', data);
      },
      async submit() {
        const userInfo = {
          username: this.username,
          password: this.password,
        };
        if (userInfo) {
          const { password, username } = userInfo;
          await this.$store.dispatch('login', { username, password });
          const { message, ok } = this.$store.getters.getUser;
          if (ok) {
            this.$router.push('/post');
            console.log(this.$router);
          } else {
            this.message = message;
            this.ok = ok;
          }
        }
      }
    },
    beforeMount() {
      console.log('mount before');
      const token = storage.getItem('token');
      if (token) {
//        console.log(token);
      }
    }
  }
</script>