<?php

session_destroy();

echo "
<script>
alert('Anda Sudah Logout');
window.location='../index.php';
</script>
";
