//console.log(process.argv)
var num1 = Number(process.argv.length)
var total = 0

for (var i = 2; i < num1; i++) {
	total += Number(process.argv[i])
}

console.log(total)