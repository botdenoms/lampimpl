
function selectUser(id, user) {
    var btn = document.getElementById('assign')
    btn.removeAttribute('disabled')
    var userNm = document.getElementById('username')
    userNm.value = user
    var userId = document.getElementById('id')
    userId.value = id
}