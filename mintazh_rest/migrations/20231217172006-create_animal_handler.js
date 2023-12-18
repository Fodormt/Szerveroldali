"use strict";

/** @type {import('sequelize-cli').Migration} */
module.exports = {
    async up(queryInterface, Sequelize) {
        await queryInterface.createTable("AnimalHandler", {
            id: {
                allowNull: false,
                autoIncrement: true,
                primaryKey: true,
                type: Sequelize.INTEGER,
            },
            createdAt: {
                allowNull: false,
                type: Sequelize.DATE,
            },
            updatedAt: {
                allowNull: false,
                type: Sequelize.DATE,
            },

            AnimalId: {
                allowNull: false,
                type: Sequelize.INTEGER,
            },
            HandlerId: {
                allowNull: false,
                type: Sequelize.INTEGER,
            },
        });
        // Csak 1szer köthetünk össze állatot és gondozót
        await queryInterface.addConstraint('AnimalHandler', {
          fields: ['AnimalId', 'HandlerId'],
          type: 'unique'
        })
    },

    // törlés
    async down(queryInterface, Sequelize) {
        await queryInterface.dropTable("AnimalHandler");
    },
};
