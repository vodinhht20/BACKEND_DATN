<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class NotifycationRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Notifications::class;
    }

    /**
     *
     * @param array $options
     * @return Builder
     */
    public function query(array $options): Builder
    {
        $query = $this->model->query();

        if (isset($options['with']) && count($options['with']) > 0) {
            $query->with($options['with']);
        }

        if (isset($options['employee_id'])) {
            $query->where("employee_id", $options['employee_id']);
        }

        if (isset($options['type'])) {
            $query->where("type", $options['type']);
        }

        if (isset($options['id'])) {
            $query->where("id", $options['id']);
        }

        if (isset($options['domain'])) {
            $query->where("domain", $options['domain']);
        }

        if (isset($options['watched'])) {
            $query->where("watched", $options['watched']);
        }

        if (isset($options['take'])) {
            $query->take($options['take']);
        }
        $query->orderBy('watched', 'asc');
        $query->orderBy('id', 'desc');
        return $query;
    }

    /**
     * Hàm lấy ra danh sách thông báo của nhân viên
     *
     * @param Employee $employee
     * @param array $options
     * @return Collection
     */
    public function getNotifyByEmployee(Employee $employee, array $options = []): Collection
    {
        $notifications = $this->query([...$options, "employee_id" => $employee->id])->get();
        $notifications = $notifications->map(function ($record) {
            $humandiff = Carbon::parse($record->created_at)->locale('vi-VN')->diffForHumans();
            $link = $record->getLink();
            $record = collect($record);
            $record->put('link', $link);
            $record->put('created_at', $humandiff);
            return $record;
        });
        return $notifications;
    }

    public function handleWatched($id, $options = [])
    {
        if ($id == 'viewed_all') {
            $notification = $this->query($options);
        } else {
            $notification = $this->query([...$options, 'id' => $id]);
        }
        return $notification->update(['watched' => 1]);
    }

    /**
     * Gửi notification
     * @param array $employee_ids
     * @param string $title
     * @param string $content
     * @param integer $domain
     * @param integer $type
     * @param string|null $link
     * @return void
     */
    public function pushNotifications(array $employee_ids, string $title, string $content, int $domain, int $type, string $link = null)
    {
        $notiData = [];
        foreach ($employee_ids as $employee_id) {
            $notiData[] = [
                'title' => $title,
                'content' => $content,
                'domain' => $domain,
                'type' => $type,
                'employee_id' => $employee_id,
                'link' => $link
            ];
        }
        $result = $this->model->insert($notiData);
        return $result;
    }

}
