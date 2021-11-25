import storage from 'good-storage'
const Token = 'Token'
// 用户信息
export function loadToken() {
  return storage.get(Token, false)
}
export function saveToken(token) {
  storage.set(Token, token)
  return token
}
export function removeToken() {
  storage.remove(Token)
  return false
}
