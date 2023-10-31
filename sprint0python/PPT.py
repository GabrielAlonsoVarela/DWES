import random

def obtener_jugada_aleatoria():
    opciones = ["piedra", "papel", "tijera"]
    return random.choice(opciones)

def determinar_ganador(jugada_usuario, jugada_computadora):
    if jugada_usuario == jugada_computadora:
        return "Empate"
    if (jugada_usuario == "piedra" and jugada_computadora == "tijera") or \
       (jugada_usuario == "papel" and jugada_computadora == "piedra") or \
       (jugada_usuario == "tijera" and jugada_computadora == "papel"):
        return "Has ganado, {} gana a {}".format(jugada_usuario, jugada_computadora)
    return "Has perdido, {} gana a {}".format(jugada_computadora, jugada_usuario)

print('Juego de Piedra, Papel y Tijera (5 jugadas)')

victorias_usuario = 0
victorias_computadora = 0
rondas_jugadas = 0

while rondas_jugadas < 5:
    jugada_usuario = input('Elige tu jugada (piedra, papel, tijera): ').lower()
    jugada_computadora = obtener_jugada_aleatoria()

    print('La computadora elige:', jugada_computadora)

    resultado = determinar_ganador(jugada_usuario, jugada_computadora)
    print(resultado)

    if "Has ganado" in resultado:
        victorias_usuario += 1
    elif "Has perdido" in resultado:
        victorias_computadora += 1

    if "Empate" not in resultado:
        rondas_jugadas += 1

print('Puntuación final:')
print('Tus victorias:', victorias_usuario)
print('Victorias de la computadora:', victorias_computadora)

if victorias_usuario > victorias_computadora:
    print('¡Has ganado el juego!')
else:
    print('Has perdido el juego.')
