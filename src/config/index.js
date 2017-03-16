/**
 * Created by bugbear on 2016/12/6.
 */
import development from './config.dev';
import production from './config.pro';
import urls from './urls';

let config = { urls: urls };
if (__DEV__) {
  config = development;
} else {
  config = production;
}