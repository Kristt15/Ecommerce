</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.alert-autohide').forEach(function (el) {
    setTimeout(function () {
        bootstrap.Alert.getOrCreateInstance(el).close();
    }, 4000);
});
</script>
</body>
</html>