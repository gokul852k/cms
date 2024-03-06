function showSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.transition = 'all .5s';
    sidebar.style.display = 'block';
}
window.onload = hideSidebar();
function hideSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'none';
}