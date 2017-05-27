export const LOGIN_URL = '/oauth/token';
export const USER_URL = '/api/user';

export const getHeader = function() {
  const tokenData = JSON.parse(window.localStorage.getItem('authUser'));
  return {
    'Accept': 'application/json',
    'Authorization': 'Bearer ' + tokenData.access_token
  }
};