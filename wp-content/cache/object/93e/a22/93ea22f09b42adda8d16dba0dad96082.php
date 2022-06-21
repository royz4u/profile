"��`<?php exit; ?>a:1:{s:7:"content";O:8:"stdClass":23:{s:2:"ID";s:3:"257";s:11:"post_author";s:1:"1";s:9:"post_date";s:19:"2019-03-31 17:02:32";s:13:"post_date_gmt";s:19:"2019-03-31 17:02:32";s:12:"post_content";s:4484:"Hello Everyone, Here on this post on Javascript we are going to discuss the variables and data types in javascript. So, the first question that comes to one's mind is: What is a <strong>Variable?</strong> A variable is a place where some value is stored. In an alternative way, a variable can be considered as a container where something is stored.

<strong>The identifier</strong> - An identifier is a name by which a variable or a function is known. In  Javascript, any combination of letters, digits, underscores and dollar signs is allowed to make up an identifier*.

<strong>Choosing Variable names:</strong> One of the most important aspects of writing clear, understandable code is choosing the appropriate names for your variables. For Ex-

var $ = " I am writing good code"  - not recommended.

var _ = " This time it's fine"  - still not recommended.

So, what is the right way to declare a good variable? The answer is that a variable's name must give some information about what it actually is intended to do or the purpose it will serve. A variable in Javascript is declared with the <strong>'var'</strong> keyword followed by the identifier. Some good examples of declaring variables are:

var name ="John Doe";
var shirt_name="Peter England";

var pi = "3.14"
var cats =["Tusy", "Joye", "Blue"];
var price ="$6.50"
...
etc.

But certainly, you don't want to name variables like as long as you wish,

var IwantToNamemyVariablelikethis90 = "Bad way to write a variable";
However, you can also use CamelCase formats for naming a variable or mix it with an AlphaNumeric format and that will work just fine. And always remember to end your variable declaration with a <strong>semi-colon (;)</strong>.

<strong>Case Sensitive -</strong> Since Javascript variables are case sensitive so Monday, monday &amp; MonDay are all different.
Wait, what?! Yes, you read that right. So for ex -

var Monday =" This is Monday";
var MonDay ="This is not same";
var monday = "This is also not the same variable";
So, Javascript will treat these 3 as different variables.

<strong>Variable minification &amp; obfuscation -</strong> Javascript developers always like to use the short variable names, like, x, a, b, c m1 etc etc. This is mostly done to decrease the characters from the page. This process is called 'minification'.

Ex- var m1, m2, m3 ;
So instead of using <strong>var yesterday, today, tomorrow;</strong>

One can write minified variables as  var y<em><strong>,t</strong></em>,to<em><strong>; </strong></em>

Variable obfuscation can be referred to with examples like

var O110 ,O101, Oi01; where <strong>O</strong> is a letter which is presented with a mix of numbers that makes the general user confused like it's a boolean value.

Similarly, var _$ ,__$$, _$$$ ; is another way of obfuscation of variables.

<strong>Variable Scope - </strong>The scope of a variable can be considered as the accessibility of the variable from different parts of the program. In other words, from where the variable is visible, i.e. from where the variable is available for use once it's available. A variable has a <strong>global &amp; local</strong> scope. A variable that can be visible from everywhere within a program is considered as a <em><strong>global variable</strong></em>. A variable which can be visible from a specific context ( a function ) can is considered of a local scope.A context is a set of defined data which is created for a specific purpose. Ex - function.

<strong>Reserved  Keywords:</strong> Now, since you are already good in declaring good variable names you should also learn about the fact that like all other programming languages there are some reserved keywords for Javascript by default which can not be used to name a variable. Ex - boolean, float, int, new, return etc. A complete list of the reserved keywords can be found <strong><a href="http://www.javascripter.net/faq/reserved.htm">here</a></strong>.

<strong>Constants -</strong> <a href="https://gameofthrones.fandom.com/wiki/Hodor"><strong>Hodor! Hodor!</strong></a> I think almost every <strong><a href="https://en.wikipedia.org/wiki/Game_of_Thrones">GOT</a></strong> fans are familiar with this word. Almost, similar to that Javascript has the provision of the constants but unfortunately, ECMAScript Edition 5 will doesn't support constants on all browsers. A value can be made using the const operator.

&nbsp;

&nbsp;

&nbsp;";s:10:"post_title";s:40:"Learn Javascript - Variables & Datatypes";s:12:"post_excerpt";s:0:"";s:11:"post_status";s:7:"publish";s:14:"comment_status";s:4:"open";s:11:"ping_status";s:4:"open";s:13:"post_password";s:0:"";s:9:"post_name";s:36:"learn-javascript-variables-datatypes";s:7:"to_ping";s:0:"";s:6:"pinged";s:0:"";s:13:"post_modified";s:19:"2019-03-31 17:02:32";s:17:"post_modified_gmt";s:19:"2019-03-31 17:02:32";s:21:"post_content_filtered";s:0:"";s:11:"post_parent";s:1:"0";s:4:"guid";s:32:"http://www.rajdeeproy.com/?p=257";s:10:"menu_order";s:1:"0";s:9:"post_type";s:4:"post";s:14:"post_mime_type";s:0:"";s:13:"comment_count";s:1:"0";}}