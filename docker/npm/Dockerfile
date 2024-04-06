# FROM node:16 AS deps
# WORKDIR /build
# COPY /backend/package*.json ./
# RUN npm i

# FROM node:16 as builder
# WORKDIR /build
# COPY ./backend/package*.json ./
# RUN npm i
# COPY ./backend .
# RUN npm run build

# FROM gcr.io/distroless/nodejs:debug
# WORKDIR /build
# COPY --from=deps /build/node_modules ./node_modules
# COPY --from=builder /build/package.json ./package.json
# EXPOSE 3000
# CMD [ "npm", "run", "dev" ]
FROM node:16
COPY ./backend ./
EXPOSE 3000
CMD [ "npm", "run", "dev" ]
