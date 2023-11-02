import random

# Guardamos cada adivinanza en una función con su respuesta correspondiente
def adivinanza_1():
    print('¿Qué cosa es, que la hacen cantando, la compran llorando y la usan sin saber?')
    print('a. La escopeta')
    print('b. El ataud')
    print('c. El reloj')
    opcion = input('Selecciona la opcion correcta (a/b/c): ')
    
    while opcion not in ['a', 'b', 'c']:
        opcion = input(opcion + ' no es una opcion válida (a/b/c): ')
    
    if opcion == 'a' or opcion == 'c':
        print('Opcion Incorrecta')
        return 0
    else:
        print('Opcion Correcta')
        return 10

def adivinanza_2():
    print('¿Qué cosa silba sin labios, corre sin pies, te pega en la espalda y aún no lo ves?')
    print('a. Las estrellas')
    print('b. El agujero')
    print('c. El viento')
    opcion = input('Selecciona la opcion correcta (a/b/c): ')
    
    while opcion not in ['a', 'b', 'c']:
        opcion = input(opcion + ' no es una opcion válida (a/b/c): ')
    
    if opcion == 'a' or opcion == 'b':
        print('Opcion Incorrecta')
        return 0
    else:
        print('Opcion Correcta')
        return 10

def adivinanza_3():
    print('¿Qué cosa es, que a su paso el hierro oxida, el acero se rompe y la carne se pudre?')
    print('a. El humo')
    print('b. El tiempo')
    print('c. La lengua')
    opcion = input('Selecciona la opcion correcta (a/b/c): ')
    
    while opcion not in ['a', 'b', 'c']:
        opcion = input(opcion + ' no es una opcion válida (a/b/c): ')
    
    if opcion == 'a' or opcion == 'c':
        print('Opcion Incorrecta')
        return 0
    else:
        print('Opcion Correcta')
        return 10

#Añadimos las funciones a una lista
adivinanzas = [adivinanza_1, adivinanza_2, adivinanza_3]
# Mezclamos el orden de las adivinanzas
random.shuffle(adivinanzas)  

puntuacion_total = 0

# Elegimos dos adivinanzas aleatorias
for adivinanza in adivinanzas[:2]: 
    puntuacion_total += adivinanza()

#Controlo que la puntuacion no sea negativa
if puntuacion_total < 0:
    puntuacion_total = 0


puntuacion_total = str(puntuacion_total)
print('Tu puntuación final es de: ' + puntuacion_total + '/20')
