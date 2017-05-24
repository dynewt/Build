<?php
var x = "adfds+fsdf-sdf";

var separators = [' ', '\\\+', '-', '\\\(', '\\\)', '\\*', '/', ':', '\\\?'];
console.log(separators.join('|'));
var tokens = x.split(new RegExp(separators.join('|'), 'g'));
console.log(tokens);

echo(tokens);
