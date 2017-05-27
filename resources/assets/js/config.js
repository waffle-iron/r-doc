export const API_DOMAIN = window.origin;
export const LOGIN_URL = '/api/auth/token';
export const USER_URL = API_DOMAIN + '/api/user';

export const getHeader = function() {
  const tokenData = JSON.parse(window.localStorage.getItem('authUser'));
  return {
    'Accept': 'application/json',
    'Authorization': 'Bearer ' + tokenData.access_token
  }
};