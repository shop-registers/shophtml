<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<title></title>
	<script>
		var example1 = new Vue({
  el: '#example-1',
  data: {
    counter: 0
  }
})
	</script>
</head>
<body>
<div id="example-1">
  <button v-on:click="counter += 1">Add 1</button>
  <p>The button above has been clicked @{{ counter }} times.</p>
</div>
</body>
</html>