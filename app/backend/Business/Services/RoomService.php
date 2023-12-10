<?php

namespace Business\Services;

use Primitives\Models\Room;
use RepositoryInterfaces\IRoomRepository;

class RoomService
{
    public function __construct(private readonly IRoomRepository $roomRepository)
    {
    }

    public function getAllRooms(): array
    {
        return $this->roomRepository->getAll();
    }

    public function getRoomById(int $id): Room
    {
        return $this->roomRepository->getById($id);
    }

    public function getRoomByCode(string $code): Room
    {
        return $this->roomRepository->getByCode($code);
    }

    public function createRoom(array $raw_room): Room
    {
        $room = new Room(
            code: $raw_room['code'],
            name: $raw_room['name'],
            floor: $raw_room['floor'],
            floor_plan_index: $raw_room['floor_plan_index'],
            capacity: $raw_room['capacity'],
            side: $raw_room['side'],
        );
        return $this->roomRepository->create($room);
    }

    public function updateRoom(string $id, array $raw_room): Room
    {
        $room = new Room(
            code: $raw_room['code'],
            name: $raw_room['name'],
            floor: $raw_room['floor'],
            floor_plan_index: $raw_room['floor_plan_index'],
            capacity: $raw_room['capacity'],
            side: $raw_room['side'],
        );
        return $this->roomRepository->update($id, $room);
    }

    public function deleteRoom(string $id): void
    {
        $this->roomRepository->delete($id);
    }
}