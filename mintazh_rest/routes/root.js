const { StatusCodes } = require("http-status-codes");
const S = require("fluent-json-schema");
const db = require("../models");
const { Sequelize, sequelize } = db;
const { ValidationError, DatabaseError, Op } = Sequelize;
// TODO: Importáld a modelleket
const { Animal, Handler, Place } = db;

module.exports = function (fastify, opts, next) {
    // http://127.0.0.1:4000/
    fastify.get("/", async (request, reply) => {
        reply.send({ message: "Gyökér végpont" });
    });

    // GET /animals
    fastify.get("/animals", async (request, reply) => {
        reply.send(await Animal.findAll());
    });

    // GET /animals/:id
    fastify.get(
        "/animals/:id",
        {
            schema: {
                params: {
                    type: "object",
                    required: ["id"],
                    properties: {
                        id: { type: "integer" },
                    },
                },
            },
        },
        async (request, reply) => {
            const { id } = request.params; // id miatt
            const animal = await Animal.findByPk(id);
            if (!animal) {
                // hibakezelés
                return reply.status(StatusCodes.NOT_FOUND).send(); //return fontos!
            }
            reply.send(animal);
        }
    );

    // POST /animals
    fastify.post(
        "/animals",
        {
            schema: {
                body: {
                    type: "object",
                    required: ["name", "weight", "birthdate", "PlaceId"],
                    properties: {
                        name: { type: "string" },
                        weight: { type: "number" },
                        birthdate: { type: "string", format: "date" },
                        // ha nullable akkor kell a default null a tesztelő miatt
                        image: { type: "string", nullable: true, default: null },
                        PlaceId: { type: "integer" },
                    },
                },
            },
        },
        async (request, reply) => {
            reply.status(StatusCodes.CREATED).send(await Animal.create(request.body));
        }
    );

    // PATCH /animals/:id
    fastify.patch(
        "/animals/:id",
        {
            schema: {
                params: {
                    type: "object",
                    required: ["id"],
                    properties: {
                        id: { type: "integer" },
                    },
                },
                body: {
                    type: "object",
                    properties: {
                        name: { type: "string" },
                        weight: { type: "number" },
                        birthdate: { type: "string", format: "date" },
                        image: { type: "string" },
                    },
                },
            },
        },
        async (request, reply) => {
            const { id } = request.params; // id miatt
            const animal = await Animal.findByPk(id);
            if (!animal) {
                // hibakezelés
                return reply.status(StatusCodes.NOT_FOUND).send(); //return fontos!
            }

            await animal.update(request.body);
            await animal.reload();

            reply.send(animal);
        }
    );

    // POST /login
    fastify.post(
        "/login",
        {
            schema: {
                body: {
                    type: "object",
                    required: ["name"],
                    properties: {
                        name: { type: "string" },
                    },
                },
            },
        },
        async (request, reply) => {
            const { name } = request.body;

            const handler = await Handler.findOne({
                where: {
                    name,
                },
            });

            if (!handler) {
                return reply.status(StatusCodes.NOT_FOUND).send();
            }

            const token = fastify.jwt.sign(handler.toJSON());

            reply.send({ token });
        }
    );

    // GET /my-animals
    fastify.get(
        "/my-animals",
        {
            onRequest: [fastify.auth], // hitelesítés
        },
        async (request, reply) => {
            const handler = await Handler.findByPk(request.user.id);

            reply.send(await handler.getAnimals());
        }
    );

    // GET /my-animals/with-place
    fastify.get(
        "/my-animals/with-place",
        {
            onRequest: [fastify.auth],
        },
        async (request, reply) => {
            const handler = await Handler.findByPk(request.user.id);
            const animals = await Animal.findAll({
                include: [
                    {
                        model: Handler,
                        where: {
                            id: request.user.id,
                        },
                        attributes: [], // eltüntetjük a pivot tábla adatait, ha nincs rá szükség
                    },
                    {
                        model: Place,
                    },
                ],
            });
            reply.send(animals);
        }
    );

    // http://127.0.0.1:4000/auth-protected
    fastify.get("/auth-protected", { onRequest: [fastify.auth] }, async (request, reply) => {
        reply.send({ user: request.user });
    });

    next();
};

module.exports.autoPrefix = "/";
