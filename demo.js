function compare(sumCharacter) {
    switch (sumCharacter) {
        case 'ks':
        case 'sb':
        case 'bk':
            return 'Win';
        case 'sk':
        case 'kb':
        case 'bs':
            return 'Lose';
        case 'ss':
        case 'bb':
        case 'kk':
            return 'Equal';
    }
}

function sumCharacter(inputUserNode, inputRandom) {
    return inputUserNode + inputRandom;
}

function random(array) {
    return array[Math.floor(Math.random() * array.length)];
}

function playGame(inputUserNode) {
    const typeGames = ['k', 'b', 's'];
    const inputRandom = random(typeGames);
    const sum = sumCharacter(inputUserNode, inputRandom);
    let isChecked = compare(sum);
    return {
        isChecked: isChecked,
        userInput: inputUserNode
    };
}

console.log(playGame('k'));

const type = [1, 2, 3, 4, 5, 6, 7, 8, 9];
console.log(random(type));