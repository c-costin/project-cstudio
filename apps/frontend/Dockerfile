FROM node@sha256:fb82287cf66ca32d854c05f54251fca8b572149163f154248df7e800003c90b5

RUN apt update && apt upgrade -y
RUN npm i -g pnpm

WORKDIR /app

COPY . .

RUN pnpm install
RUN pnpm run build
RUN pnpm prune --prod

CMD [ "node", "build" ]