print('¿Qué cosa es, que la hacen cantando, la compran llorando y la usan sin saber?')
print('a. La escopeta')
print('b. El ataud')
print('c. El reloj')
opcion = input('Selecciona la opcion correcta (a/b/c): ')
puntuacion=0

if opcion == 'a':
    print('Opcion Incorrecta')
    puntuacion=puntuacion-5
elif opcion == 'c':
    print('Opcion Incorrecta')
    puntuacion=puntuacion-5
else:
    print('Opcion Correcta')
    puntuacion=puntuacion+10

print('¿Qué cosa silba sin labios, corre sin pies, te pega en la espalda y aún no lo ves?')
print('a. Las estrellas')
print('b. El agujero')
print('c. El viento')
opcion = input('Selecciona la opcion correcta (a/b/c): ')

if opcion == 'a':
    print('Opcion Incorrecta')
    puntuacion=puntuacion-5
elif opcion == 'b':
    print('Opcion Incorrecta')
    puntuacion=puntuacion-5
else:
    print('Opcion Correcta')
    puntuacion=puntuacion+10

print('¿Qué cosa es, que a su paso el hierro oxida, el acero se rompe y la carne se pudre?')
print('a. El humo')
print('b. El tiempo')
print('c. La lengua')
opcion = input('Selecciona la opcion correcta (a/b/c): ')

if opcion == 'a':
    print('Opcion Incorrecta')
    puntuacion=puntuacion-5
elif opcion == 'c':
    print('Opcion Incorrecta')
    puntuacion=puntuacion-5
else:
    print('Opcion Correcta')
    puntuacion=puntuacion+10

if puntuacion<0:
    puntuacion=0
    
puntuacion=str(puntuacion)
print('Tu puntuacion final es de: ' + puntuacion + '/30')
