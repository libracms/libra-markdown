Libra Markdown
=======================

Usage
------------
You can use it as view helper
~~~
echo $this->markdown('Some **markdown** text');
~~~
or as library
~~~
echo \Michelf\Markdown\Markdown::defaultTransform($text);
~~~