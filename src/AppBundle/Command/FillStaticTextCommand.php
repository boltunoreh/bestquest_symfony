<?php

namespace AppBundle\Command;

use AppBundle\Entity\StaticText;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FillStaticTextCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:fill-static-text');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');


        foreach ($this->getData() as $datum) {
            $staticText = new StaticText();

            $staticText->setType($datum['type'])
                ->setTitle($datum['title'])
                ->setContent($datum['content']);

            $em->persist($staticText);
        }

        $em->flush();

        $output->writeln('Static texts successfully created!');
    }

    /**
     * @return array
     */
    private function getData()
    {
        return [
            [
                'type' => StaticText::TYPE_ABOUT,
                'title' => 'О компании',
                'content' => <<<CONTENT
          <p>Мы знаем толк в приключениях, мы ценим вкус испытаний, разбивающих туманное зеркало будней. Мы верим в необходимость личных подвигов, опыта преодоления своих ограничений, которые выстраиваем сами. Мы разрушаем стереотипы проведения выходных и корпоративных выездов «на природу с шашлыками». Мы не боимся нестандартных решений. Мы знаем секреты побед - командных и личных. Те, кто хоть раз погрузился в историю, которую мы создаем, потом возвращаются снова и снова – одни, с детьми и со своей командой. Каждый участник проекта открывает что-то новое в себе и других и меняет свою жизнь на основе этих открытий.</p>
          <p>Мы предлагаем проекты для каждого – если вы хотите провести свой день рожденья или другой праздник на природе, совершая открытия и погружаясь в атмосферу приключений, мы ждем вас!</p>
CONTENT
                ,
            ],
            [
                'type' => StaticText::TYPE_ORDER_FORM,
                'title' => 'Заявка',
                'content' => <<<CONTENTT
Если вы хотите, чтобы мы создали эксклюзивный проект для вас, напишите нам, используя контактную форму или почту. Поделитесь всеми вашими пожеланиями, целью вашего мероприятия и концепцией. Мы постараемся ответить как можно скорее
CONTENTT
                ,
            ],
        ];
    }
}