import develop from './develop';
import production from './production';

let config = {
  version: '0.1.1'
};

const env = process.env.NODE_ENV;
if(env === 'production') {
  config = Object.assign(config, production);
} else {
  config = Object.assign(config, develop);
}

export default config;