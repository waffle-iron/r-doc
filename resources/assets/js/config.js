export const API_DOMAIN = location.origin;
export const LOGIN_URL = API_DOMAIN + '/oauth/token';
export const USER_URL = API_DOMAIN + '/api/user';

export const getHeader = function() {
  const tokenData = JSON.parse(window.localStorage.getItem('authUser'));
  return {
    'Accept': 'application/json',
    'Authorization': 'Bearer ' + tokenData.access_token
  }
};