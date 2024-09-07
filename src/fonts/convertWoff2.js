import { readFile, writeFile } from 'node:fs/promises';
import ttf2woff2 from 'ttf2woff2';

const input = await readFile('./src/fonts/monof55.ttf');

await writeFile('../../fonts/monofur.woff2', ttf2woff2(input));
