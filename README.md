# ColoredBalls

1. Se dau bile de n culori (pentru a nu complica prea mult n este limitat la 10). Se va prelua de la tastatura n. 
In total sunt n x n bile (n la patrat). 
Distributia bilelor pe culori este random.

Exemplu: 
Pentru n=3 culori (rosu,galben,albastru) avem 9 bile si o distributie ar putea fi 1 bila rosie, 3 bile galbene, 5 bile albastre.

2. Sa se decida daca este posibil si in caz afirmativ sa se prezinte algoritmul general prin care bilele sunt repartizate in n grupe de cate n bile astfel incat in fiecare grupa sa fie bile de maxim 2 culori diferite (sunt permise si grupe cu o singura culoare) indiferent de distributia initiala.

Exemplu de grupare:
Pentru n=3 culori (rosu,galben,albastru) avem 9 bile  si distributia 1 bila rosie, 3 bile galbene, 5 bile albastre o varianta de grupare in 3 grupe de cate 3 bile astfel incat in orice grupa sa fie maxim 2 culori ar fi :

- prima grupa:   1 bila galbena si 2 albastre
- a doua grupa: 1 bila rosie si 2 galbene
- a treia grupa : 3 bile albastre

Nota: e posibil ca un algoritm general care sa functioneze pe orice distributie si orice valoare n sa aleaga alta grupare in cazul de mai sus.